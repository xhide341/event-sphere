<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class SidebarToggle extends Component
{

}
?>

<button 
    x-data="{ sidebarOpen: false }" 
    @click="sidebarOpen = !sidebarOpen; $dispatch('toggle-sidebar')"
    class="relative w-8 h-8"
>
    <svg 
        x-show="!sidebarOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="absolute inset-0"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 32 32" height="32" width="32" id="Menu-Fill--Streamline-Rounded-Fill---Material-Symbols"
    >
        <path fill="#000" d="M4.843749999999999 23.249999999999996C4.5692708333333325 23.249999999999996 4.339244374999999 23.156547916666664 4.153677083333332 22.969708333333333C3.967890208333333 22.7830625 3.8749999999999996 22.551660416666664 3.8749999999999996 22.2754375C3.8749999999999996 21.99947291666666 3.967890208333333 21.76994375 4.153677083333332 21.586979166666662C4.339244374999999 21.404014583333332 4.5692708333333325 21.312499999999996 4.843749999999999 21.312499999999996H26.156249999999996C26.430729166666662 21.312499999999996 26.66083958333333 21.405952083333332 26.846645833333334 21.592791666666663C27.032193749999994 21.779437499999997 27.124999999999996 22.01083958333333 27.124999999999996 22.287062499999998C27.124999999999996 22.56302708333333 27.032193749999994 22.792556249999997 26.846645833333334 22.975520833333334C26.66083958333333 23.158485416666664 26.430729166666662 23.249999999999996 26.156249999999996 23.249999999999996H4.843749999999999ZM4.843749999999999 16.468749999999996C4.5692708333333325 16.468749999999996 4.339244374999999 16.375297916666664 4.153677083333332 16.18845833333333C3.967890208333333 16.0018125 3.8749999999999996 15.770410416666666 3.8749999999999996 15.494187499999999C3.8749999999999996 15.218222916666665 3.967890208333333 14.98869375 4.153677083333332 14.805729166666666C4.339244374999999 14.622764583333332 4.5692708333333325 14.531249999999998 4.843749999999999 14.531249999999998H26.156249999999996C26.430729166666662 14.531249999999998 26.66083958333333 14.624702083333332 26.846645833333334 14.811541666666665C27.032193749999994 14.998187499999998 27.124999999999996 15.22958958333333 27.124999999999996 15.505812499999998C27.124999999999996 15.781777083333331 27.032193749999994 16.011306249999997 26.846645833333334 16.19427083333333C26.66083958333333 16.377235416666664 26.430729166666662 16.468749999999996 26.156249999999996 16.468749999999996H4.843749999999999ZM4.843749999999999 9.687499999999998C4.5692708333333325 9.687499999999998 4.339244374999999 9.594047916666666 4.153677083333332 9.407208333333333C3.967890208333333 9.220562499999998 3.8749999999999996 8.989160416666666 3.8749999999999996 8.712937499999999C3.8749999999999996 8.436972916666667 3.967890208333333 8.20744375 4.153677083333332 8.024479166666666C4.339244374999999 7.841514583333333 4.5692708333333325 7.749999999999999 4.843749999999999 7.749999999999999H26.156249999999996C26.430729166666662 7.749999999999999 26.66083958333333 7.843452083333332 26.846645833333334 8.030291666666665C27.032193749999994 8.2169375 27.124999999999996 8.448339583333333 27.124999999999996 8.7245625C27.124999999999996 9.000527083333331 27.032193749999994 9.230056249999999 26.846645833333334 9.413020833333333C26.66083958333333 9.595985416666666 26.430729166666662 9.687499999999998 26.156249999999996 9.687499999999998H4.843749999999999Z" stroke-width="1"></path>
    </svg>

    <svg 
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="absolute inset-0"
        viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="32" width="32" id="Menu-2-Fill--Streamline-Remix-Fill"
    >
        <path d="M4 5.333333333333333H28V8H4V5.333333333333333ZM4 14.666666666666666H20V17.333333333333332H4V14.666666666666666ZM4 24H28V26.666666666666664H4V24Z" stroke-width="1"></path>
    </svg>
</button>