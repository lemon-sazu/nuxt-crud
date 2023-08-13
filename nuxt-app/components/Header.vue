<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
            <div class="container">
                <NuxtLink class="navbar-brand" to="/"><b>Nuxt3 CRUD</b></NuxtLink>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <NuxtLink class="nav-link active" aria-current="page" to="/">Home</NuxtLink>
                    </li>
                    <li class="nav-item">
                        <NuxtLink class="nav-link" to="/about-us">About Us</NuxtLink>
                    </li>
                    <li class="nav-item">
                        <NuxtLink class="nav-link" to="/contact-us">Contact Us</NuxtLink>
                    </li>
                    <li class="nav-item dropdown">
                        <NuxtLink class="nav-link dropdown-toggle" to="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Students
                        </NuxtLink>
                        <ul class="dropdown-menu">
                            <li><NuxtLink class="dropdown-item" to="/students">Students</NuxtLink></li>
                            <li><NuxtLink class="dropdown-item" to="/students/create">Create</NuxtLink></li>
                            
                        </ul>
                        </li>
                </ul>
                </div>
            </div>
        </nav>
    </div>
</template>