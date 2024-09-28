<?php

use Livewire\Volt\Component;

new class extends Component
{
    public $event;
    public $showModal = false;
    public $modalContent = null;

    public function mount($event)
    {
        $this->event = $event;
        $this->preloadModalContent();
    }

    public function preloadModalContent()
    {
        // Fetch and prepare all the data needed for the modal
        $this->modalContent = [
            'name' => $this->event->name,
            'image' => $this->event->image,
            'department' => $this->event->department->name,
            'description' => $this->event->description,
            'venue' => $this->event->venue,
            'participant_count' => $this->event->participant_count,
            'capacity' => $this->event->capacity,
            'status' => $this->event->status,
            'category' => $this->event->category,
        ];
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }
}; ?>

<section x-data="{ showModal: @entangle('showModal') }">
    <div class="relative flex w-[21rem] h-[32rem] flex-col rounded-xl bg-gray-300 bg-clip-border text-gray-700 shadow-lg border-2 border-gray-400 cursor-pointer"
         @click="showModal = true">
      <div class="relative mx-4 mt-4 overflow-hidden rounded-md bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
        <img
          src="{{ $event->image }}"
          alt="{{ $event->name }}"
          class="w-full h-[10rem] object-cover"
        />
        <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60"></div>
        <button
          class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle text-xs font-medium uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button"
          data-ripple-dark="true"
        >
          <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              aria-hidden="true"
              class="h-6 w-6"
            >
              <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"></path>
            </svg>
          </span>
        </button>
        <div class="absolute bottom-0 left-0 p-2">
          <span class="bg-white rounded-full px-3 py-1 text-sm font-semibold text-primary">
            {{ $event->department->name }}
          </span>
        </div>
      </div>
      <div class="p-6">
        <div class="mb-3 flex flex-col justify-between">
          <h5 class="block text-xl font-medium leading-snug tracking-normal text-blue-gray-900 antialiased truncate">
            {{ $event->name }}
          </h5>
          <p class="text-sm font-light text-primary">
            {{ $event->venue }}
          </p>
        </div>
        <div class="min-h-[2.5rem]">
          <p class="line-clamp-2 text-sm font-light text-gray-700">
            {{ $event->description }}
          </p>
        </div>
        <div class="group mt-8 inline-flex flex-wrap items-center gap-3">
          <span
            data-tooltip-target="money"
            class="cursor-pointer rounded-full border border-patten-blue bg-white p-3 text-primary-500 transition-colors hover:border-primary-500/10 hover:bg-primary-500/10 hover:!opacity-100 group-hover:opacity-70"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              aria-hidden="true"
              class="h-5 w-5"
            >
              <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
              <path
                fill-rule="evenodd"
                d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                clip-rule="evenodd"
              ></path>
              <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"></path>
            </svg>
          </span>
          <span
            data-tooltip-target="wifi"
            class="cursor-pointer rounded-full border border-patten-blue bg-white p-3 text-primary-500 transition-colors hover:border-primary-500/10 hover:bg-primary-500/10 hover:!opacity-100 group-hover:opacity-70"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              aria-hidden="true"
              class="h-5 w-5"
            >
              <path
                fill-rule="evenodd"
                d="M1.371 8.143c5.858-5.857 15.356-5.857 21.213 0a.75.75 0 010 1.061l-.53.53a.75.75 0 01-1.06 0c-4.98-4.979-13.053-4.979-18.032 0a.75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.182 3.182c4.1-4.1 10.749-4.1 14.85 0a.75.75 0 010 1.061l-.53.53a.75.75 0 01-1.062 0 8.25 8.25 0 00-11.667 0 .75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.204 3.182a6 6 0 018.486 0 .75.75 0 010 1.061l-.53.53a.75.75 0 01-1.061 0 3.75 3.75 0 00-5.304 0 .75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.182 3.182a1.5 1.5 0 012.122 0 .75.75 0 010 1.061l-.53.53a.75.75 0 01-1.061 0l-.53-.53a.75.75 0 010-1.06z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </span>
    
          <span
            data-tooltip-target="bedrooms"
            class="cursor-pointer rounded-full border border-patten-blue bg-white p-3 text-primary-500 transition-colors hover:border-primary-500/10 hover:bg-primary-500/10 hover:!opacity-100 group-hover:opacity-70"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              aria-hidden="true"
              class="h-5 w-5"
            >
              <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"></path>
              <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"></path>
            </svg>
          </span>
    
          <span
            data-tooltip-target="tv"
            class="cursor-pointer rounded-full border border-patten-blue bg-white p-3 text-primary-500 transition-colors hover:border-primary-500/10 hover:bg-primary-500/10 hover:!opacity-100 group-hover:opacity-70"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              aria-hidden="true"
              class="h-5 w-5"
            >
              <path d="M19.5 6h-15v9h15V6z"></path>
              <path
                fill-rule="evenodd"
                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v11.25C1.5 17.16 2.34 18 3.375 18H9.75v1.5H6A.75.75 0 006 21h12a.75.75 0 000-1.5h-3.75V18h6.375c1.035 0 1.875-.84 1.875-1.875V4.875C22.5 3.839 21.66 3 20.625 3H3.375zm0 13.5h17.25a.375.375 0 00.375-.375V4.875a.375.375 0 00-.375-.375H3.375A.375.375 0 003 4.875v11.25c0 .207.168.375.375.375z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </span>
          <span
            data-tooltip-target="fire"
            class="cursor-pointer rounded-full border border-patten-blue bg-white p-3 text-primary-500 transition-colors hover:border-primary-500/10 hover:bg-primary-500/10 hover:!opacity-100 group-hover:opacity-70"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              aria-hidden="true"
              class="h-5 w-5"
            >
              <path
                fill-rule="evenodd"
                d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </span>
    
        </div>
      </div>
      <div class="p-6 pt-3">
        <button
          class="block w-full select-none rounded-lg bg-primary py-3.5 px-7 text-center align-middle text-sm font-bold uppercase text-white shadow-md shadow-primary-500/20 transition-all hover:shadow-lg hover:shadow-primary-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          type="button"
          data-ripple-light="true"
        >
          Register
        </button>
      </div>
    </div>

    <!-- Modal -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="leading-normal font-poppins bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg leading-6 font-medium text-primary" id="modal-title">
                            {{ $modalContent['name'] }}
                        </h3>
                        <button type="button" class="text-gray-400 hover:text-gray-500" @click="showModal = false">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-2 break-words text-pretty font-normal">
                        <div class="relative">
                          <img src="{{ $modalContent['image'] }}" alt="{{ $modalContent['name'] }}" class="w-full h-48 object-cover rounded-md">
                          <p class="absolute bottom-0 left-0 m-2 bg-white rounded-full px-3 py-1 text-sm font-semibold text-primary">{{ $modalContent['department'] }}</p>
                        </div>
                        <div class="mt-2 p-2">
                          <h5 class="text-lg font-semibold text-primary">Details:</h5>
                          <p class="text-base text-primary font-normal">{{ $modalContent['description'] }}</p>
                        </div>
                        <div class="flex items-center space-x-2 mt-2 px-2">
                          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0B2147"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 400Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Z"/></svg>
                          <p class="text-sm tracking-wide font-normal text-primary">{{ $modalContent['venue'] }}</p>
                        </div>
                        <div class="flex items-center space-x-2 mt-2 px-2">
                          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0B2147"><path d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Z"/></svg>
                          <p class="text-sm tracking-wide font-normal text-primary">{{ $modalContent['participant_count'] }} / {{ $modalContent['capacity'] }}</p>
                        </div>
                        <div class="flex items-center space-x-2 mt-2 px-2">
                          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0B2147"><path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/></svg>
                          <p class="text-sm tracking-wide font-normal {{ $modalContent['status'] === 'Postponed' ? 'text-danger' : ($modalContent['status'] === 'Delayed' ? 'text-warning' : ($modalContent['status'] === 'Scheduled' ? 'text-success' : 'text-primary')) }}">
                              {{ $modalContent['status'] }}
                          </p>
                        </div>
                        <div class="flex items-center space-x-2 mt-2 px-2">
                          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0B2147"><path d="M240-120q-66 0-113-47T80-280q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm480 0q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM480-520q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Z"/></svg>
                          <p class="text-sm tracking-wide font-normal text-primary">{{ $modalContent['category'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


