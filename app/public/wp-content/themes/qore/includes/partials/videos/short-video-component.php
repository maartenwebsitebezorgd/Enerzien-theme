<div id="id-video" data-video-type="vidstack"
    class="short-video relative bg-gray-200 w-full aspect-[9/16] overflow-hidden">
    <div playsinline data-video-target="true" src="<?php echo $item['video_url'] ?>" muted="true" loop="true"
        title="title" data-autoplay-on-view="false" controls="true"
        class="w-full h-full aspect-[9/16] absolute inset-0">
    </div>
</div>

<style>
    .short-video :where([data-media-player][data-view-type=video]) {
        aspect-ratio: inherit !important;
    }
</style>

<script>
    pageFunctions.addFunction("vidstackAutoplayVideo", function () {
        const loadVidstack = async () => {
            try {
                const { PlyrLayout, VidstackPlayer } = await import(
                    "https://cdn.vidstack.io/player"
                );
                initVideoManager(PlyrLayout, VidstackPlayer);
            } catch (error) {
                console.error("Error loading Vidstack:", error);
            }
        };

        const initVideoManager = (PlyrLayout, VidstackPlayer) => {
            class VideoPlayerManager {
                constructor() {
                    this.players = new Map();
                    this.triggers = new Map();
                    this.currentlyPlaying = null;
                    this.init();
                }

                async init() {
                    try {
                        await this.initPlayers();
                    } catch (error) {
                        console.error("Failed to initialize video players:", error);
                    }
                }

                async initPlayers() {
                    const containers = document.querySelectorAll("[data-video-type='vidstack']");
                    for (const container of containers) {
                        try {
                            await this.initSinglePlayer(container);
                        } catch (error) {
                            console.error("Failed to initialize player:", error);
                        }
                    }
                }

                async initSinglePlayer(container) {
                    const videoTarget = container.querySelector("[data-video-target='true']");
                    if (!videoTarget) return;

                    const autoplayOnView = videoTarget.getAttribute("data-autoplay-on-view") === "true";
                    const shouldLoop = videoTarget.getAttribute("loop") === "true";
                    const shouldBeMuted = videoTarget.getAttribute("muted") === "true";
                    const shouldHaveControls = videoTarget.getAttribute("controls") === "true";

                    if (autoplayOnView) {
                        videoTarget.setAttribute("playsinline", "");
                        videoTarget.setAttribute("webkit-playsinline", "");
                        videoTarget.setAttribute("muted", "true");
                        videoTarget.muted = true;
                    }

                    const player = await VidstackPlayer.create({
                        target: videoTarget,
                        layout: new PlyrLayout(),
                        options: {
                            preload: "metadata",
                            playsinline: autoplayOnView,
                            muted: autoplayOnView ? true : shouldBeMuted,
                            controls: shouldHaveControls,
                            loop: shouldLoop,
                            autopause: true,
                            clickToPlay: true,
                        },
                    });

                    // Add play event listener to manage other videos
                    player.addEventListener("play", () => {
                        this.pauseOtherVideos(container);
                        this.currentlyPlaying = container;
                    });

                    player.addEventListener("can-play", () => {
                        console.log("Media is ready to play.");
                        if (autoplayOnView) {
                            this.setupScrollTrigger(container, player);
                        }
                    });

                    this.players.set(container, player);
                    this.setupEventListeners(player, container);

                    return player;
                }

                pauseOtherVideos(currentContainer) {
                    this.players.forEach((player, container) => {
                        if (container !== currentContainer && !player.paused) {
                            player.pause();
                        }
                    });
                }

                setupScrollTrigger(container, player) {
                    const trigger = ScrollTrigger.create({
                        trigger: container,
                        start: "top 80%",
                        end: "bottom 20%",
                        onEnter: () => {
                            this.pauseOtherVideos(container);
                            player.currentTime = 0;
                            player.muted = true;
                            player.play().catch((error) => {
                                console.error("Autoplay error (ScrollTrigger onEnter):", error);
                            });
                        },
                        onLeave: () => {
                            player.pause();
                        },
                        onEnterBack: () => {
                            this.pauseOtherVideos(container);
                            player.muted = true;
                            player.play().catch((error) => {
                                console.error("Autoplay error (ScrollTrigger onEnterBack):", error);
                            });
                        },
                        onLeaveBack: () => {
                            player.pause();
                        },
                    });

                    this.triggers.set(container, trigger);
                }

                setupEventListeners(player, container) {
                    const videoCover = container.querySelector("[data-video-cover='true']");
                    if (!videoCover) return;

                    videoCover.classList.remove("is-playing");

                    player.addEventListener("play", () => {
                        videoCover.classList.add("is-playing");
                    });

                    player.addEventListener("pause", () => {
                        videoCover.classList.remove("is-playing");
                    });

                    videoCover.addEventListener("click", (event) => {
                        event.preventDefault();
                        if (player.paused) {
                            this.pauseOtherVideos(container);
                            player.muted = true;
                            player.play().catch((error) => {
                                console.error("Play error on cover click:", error);
                            });
                        } else {
                            player.pause();
                        }
                    });
                }

                destroy() {
                    this.triggers.forEach((trigger) => trigger.kill());
                    this.triggers.clear();

                    this.players.forEach((player) => player.destroy());
                    this.players.clear();
                    this.currentlyPlaying = null;
                }
            }

            const manager = new VideoPlayerManager();
            window.addEventListener("unload", () => manager.destroy());
        };

        loadVidstack();
    });
</script>