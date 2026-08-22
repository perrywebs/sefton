<?php

<img src="{{ asset('storage/app/public/' . $settings->logo) }}"
                            alt="{{ $settings->site_name }}" class="h-10 w-auto object-contain">


                            <html lang="en" x-data="{ darkMode: false, mobileMenuOpen: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)" :class="{ 'dark': darkMode }">

                            {{ asset('storage/app/public/' . $settings->favicon) }}