<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const logo = ref(usePage().props.configs.logo);
</script>

<template>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
            <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop
                        offset="0%"
                        style="stop-color: #282c34; stop-opacity: 1"
                    />
                    <stop
                        offset="100%"
                        style="stop-color: #1c1f25; stop-opacity: 1"
                    />
                </linearGradient>
            </defs>
            <rect x="0" y="0" width="200" height="200" fill="url(#grad1)" />
            <g transform="translate(10, 50)">
                <circle cx="-30" cy="-30" r="15" fill="#4CAF50" />
                <circle cx="0" cy="-40" r="15" fill="#FF9800" />
                <circle cx="30" cy="-30" r="15" fill="#9C27B0" />
                <circle cx="40" cy="0" r="15" fill="#2196F3" />
                <circle cx="30" cy="30" r="15" fill="#F44336" />
                <circle cx="0" cy="40" r="15" fill="#673AB7" />
                <circle cx="-30" cy="30" r="15" fill="#FFEB3B" />
                <path
                    d="M-30,-30 L0,-40 M0,-40 L30,-30 M30,-30 L40,0 M40,0 L30,30 M30,30 L0,40 M0,40 L-30,30 M-30,30 L-30,-30"
                    fill="none"
                    stroke="#FFF"
                    stroke-width="2"
                />
            </g>


            <text
                x="50%"
                y="85%"
                text-anchor="middle"
                fill="#FFF"
                font-family="Arial, sans-serif"
                font-size="30"
                font-weight="bold"
            >
                TweetNow
            </text>
        </svg>
    </div>
</template>
