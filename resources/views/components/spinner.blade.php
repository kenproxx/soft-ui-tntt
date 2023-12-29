<style>
    #loading-master.loading-overlay-master {
        display: none;
        background: rgba(255, 255, 255, 0.7);
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        z-index: 9998;
        align-items: center;
        justify-content: center;
    }
    #loading-master.loading-overlay-master.is-active {
        display: flex;
    }


    #loading-master main {
        display: flex;
        padding: 1.5em;
        gap: 3em;
        flex-wrap: wrap;
        justify-content: center;
        margin: auto;
        z-index: 999;
        position: absolute;
    }

    #loading-master .pl1,
    #loading-master .pl2,
    #loading-master .pl3 {
        display: block;
        width: 8em;
        height: 8em;
    }

    #loading-master .pl1__g,
    #loading-master .pl1__rect,
    #loading-master .pl2__rect,
    #loading-master .pl2__rect-g,
    #loading-master .pl3__rect {
        animation: pl1-a 1.5s cubic-bezier(0.65, 0, 0.35, 1) infinite;
    }

    #loading-master .pl1__g {
        transform-origin: 64px 64px;
    }

    #loading-master .pl1__rect:first-child {
        animation-name: pl1-b;
    }

    #loading-master .pl1__rect:nth-child(2) {
        animation-name: pl1-c;
    }

    #loading-master .pl2__rect,
    #loading-master .pl2__rect-g {
        animation-name: pl2-a;
    }

    #loading-master .pl2__rect {
        animation-name: pl2-b;
    }

    #loading-master .pl2__rect-g .pl2__rect {
        transform-origin: 20px 128px;
    }

    #loading-master .pl2__rect-g:first-child,
    #loading-master .pl2__rect-g:first-child .pl2__rect {
        animation-delay: -0.25s;
    }

    #loading-master .pl2__rect-g:nth-child(2),
    #loading-master .pl2__rect-g:nth-child(2) .pl2__rect {
        animation-delay: -0.125s;
    }

    #loading-master .pl2__rect-g:nth-child(2) .pl2__rect {
        transform-origin: 64px 128px;
    }

    #loading-master .pl2__rect-g:nth-child(3) .pl2__rect {
        transform-origin: 108px 128px;
    }

    #loading-master .pl3__rect {
        animation-name: pl3;
    }

    #loading-master .pl3__rect-g {
        transform-origin: 64px 64px;
    }

    /* Dark theme */
    @media (prefers-color-scheme: dark) {
        :root {
            --bg: hsl(var(--hue), 90%, 10%);
            --fg: hsl(var(--hue), 90%, 90%);
        }
    }

    /* Animations */
    @keyframes pl1-a {
        from {
            transform: rotate(0);
        }
        80%,
        to {
            animation-timing-function: steps(1, start);
            transform: rotate(90deg);
        }
    }

    @keyframes pl1-b {
        from {
            animation-timing-function: cubic-bezier(0.33, 0, 0.67, 0);
            width: 40px;
            height: 40px;
        }
        20% {
            animation-timing-function: steps(1, start);
            width: 40px;
            height: 0;
        }
        60% {
            animation-timing-function: cubic-bezier(0.65, 0, 0.35, 1);
            width: 0;
            height: 40px;
        }
        80%,
        to {
            width: 40px;
            height: 40px;
        }
    }

    @keyframes pl1-c {
        from {
            animation-timing-function: cubic-bezier(0.33, 0, 0.67, 0);
            width: 40px;
            height: 40px;
            transform: translate(0, 48px);
        }
        20% {
            animation-timing-function: cubic-bezier(0.33, 1, 0.67, 1);
            width: 40px;
            height: 88px;
            transform: translate(0, 0);
        }
        40% {
            animation-timing-function: cubic-bezier(0.33, 0, 0.67, 0);
            width: 40px;
            height: 40px;
            transform: translate(0, 0);
        }
        60% {
            animation-timing-function: cubic-bezier(0.33, 1, 0.67, 1);
            width: 88px;
            height: 40px;
            transform: translate(0, 0);
        }
        80%,
        to {
            width: 40px;
            height: 40px;
            transform: translate(48px, 0);
        }
    }

    @keyframes pl2-a {
        from,
        25%,
        66.67%,
        to {
            transform: translateY(0);
        }
        50% {
            animation-timing-function: cubic-bezier(0.33, 0, 0.67, 0);
            transform: translateY(-80px);
        }
    }

    @keyframes pl2-b {
        from,
        to {
            animation-timing-function: cubic-bezier(0.33, 0, 0.67, 0);
            width: 40px;
            height: 24px;
            transform: rotate(180deg) translateX(0);
        }
        33.33% {
            animation-timing-function: cubic-bezier(0.33, 1, 0.67, 1);
            width: 20px;
            height: 64px;
            transform: rotate(180deg) translateX(10px);
        }
        66.67% {
            animation-timing-function: cubic-bezier(0.33, 1, 0.67, 1);
            width: 28px;
            height: 44px;
            transform: rotate(180deg) translateX(6px);
        }
    }

    @keyframes pl3 {
        from {
            transform: translate(64px, 0);
            width: 64px;
            height: 64px;
        }
        25% {
            transform: translate(0, 0);
            width: 128px;
            height: 32px;
        }
        50% {
            transform: translate(0, 0);
            width: 64px;
            height: 64px;
        }
        75% {
            transform: translate(0, 0);
            width: 32px;
            height: 128px;
        }
        to {
            transform: translate(0, 64px);
            width: 64px;
            height: 64px;
        }
    }
</style>

<main class="loading-overlay-master" id="loading-master" wire:loading.flex >
    <svg class="pl1" viewBox="0 0 128 128" width="128px" height="128px">
        <defs>
            <linearGradient id="pl-grad" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#000"/>
                <stop offset="100%" stop-color="#fff"/>
            </linearGradient>
            <mask id="pl-mask">
                <rect x="0" y="0" width="128" height="128" fill="url(#pl-grad)"/>
            </mask>
        </defs>
        <g fill="var(--primary)">
            <g class="pl1__g">
                <g transform="translate(20,20) rotate(0,44,44)">
                    <g class="pl1__rect-g">
                        <rect class="pl1__rect" rx="8" ry="8" width="40" height="40"/>
                        <rect class="pl1__rect" rx="8" ry="8" width="40" height="40" transform="translate(0,48)"/>
                    </g>
                    <g class="pl1__rect-g" transform="rotate(180,44,44)">
                        <rect class="pl1__rect" rx="8" ry="8" width="40" height="40"/>
                        <rect class="pl1__rect" rx="8" ry="8" width="40" height="40" transform="translate(0,48)"/>
                    </g>
                </g>
            </g>
        </g>
        <g fill="hsl(343,90%,50%)" mask="url(#pl-mask)">
            <g class="pl1__g">
                <g transform="translate(20,20) rotate(0,44,44)">
                    <g class="pl1__rect-g">
                        <rect class="pl1__rect" rx="8" ry="8" width="40" height="40"/>
                        <rect class="pl1__rect" rx="8" ry="8" width="40" height="40" transform="translate(0,48)"/>
                    </g>
                    <g class="pl1__rect-g" transform="rotate(180,44,44)">
                        <rect class="pl1__rect" rx="8" ry="8" width="40" height="40"/>
                        <rect class="pl1__rect" rx="8" ry="8" width="40" height="40" transform="translate(0,48)"/>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    <svg class="pl2" viewBox="0 0 128 128" width="128px" height="128px">
        <g fill="var(--primary)">
            <g class="pl2__rect-g">
                <rect class="pl2__rect" rx="8" ry="8" x="0" y="128" width="40" height="24" transform="rotate(180)"/>
            </g>
            <g class="pl2__rect-g">
                <rect class="pl2__rect" rx="8" ry="8" x="44" y="128" width="40" height="24" transform="rotate(180)"/>
            </g>
            <g class="pl2__rect-g">
                <rect class="pl2__rect" rx="8" ry="8" x="88" y="128" width="40" height="24" transform="rotate(180)"/>
            </g>
        </g>
        <g fill="hsl(283,90%,50%)" mask="url(#pl-mask)">
            <g class="pl2__rect-g">
                <rect class="pl2__rect" rx="8" ry="8" x="0" y="128" width="40" height="24" transform="rotate(180)"/>
            </g>
            <g class="pl2__rect-g">
                <rect class="pl2__rect" rx="8" ry="8" x="44" y="128" width="40" height="24" transform="rotate(180)"/>
            </g>
            <g class="pl2__rect-g">
                <rect class="pl2__rect" rx="8" ry="8" x="88" y="128" width="40" height="24" transform="rotate(180)"/>
            </g>
        </g>
    </svg>
    <svg class="pl3" viewBox="0 0 128 128" width="128px" height="128px">
        <g fill="var(--primary)">
            <rect class="pl3__rect" rx="8" ry="8" width="64" height="64" transform="translate(64,0)"/>
            <g class="pl3__rect-g" transform="scale(-1,-1)">
                <rect class="pl3__rect" rx="8" ry="8" width="64" height="64" transform="translate(64,0)"/>
            </g>
        </g>
        <g fill="hsl(163,90%,50%)" mask="url(#pl-mask)">
            <rect class="pl3__rect" rx="8" ry="8" width="64" height="64" transform="translate(64,0)"/>
            <g class="pl3__rect-g" transform="scale(-1,-1)">
                <rect class="pl3__rect" rx="8" ry="8" width="64" height="64" transform="translate(64,0)"/>
            </g>
        </g>
    </svg>

</main>
