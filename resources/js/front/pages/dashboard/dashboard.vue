<template>
    <div class="dashboard" style="background-image: url('/images/auth/bookmark.jpg')">

        <div class="container pt-5">
            <div class="card card-glass mt-5 mb-4 p-md-5">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Your Bookmarks</h3>
                    <button class="btn btn-theme">New <span class="d-sm-inline d-none">Bookmark</span></button>
                </div>

                <div class="card-body glass-body">
                    <div class="no-data">
                        <div class="icon">
                            <img :src="`/images/global/no-data.svg`" alt="no data">
                        </div>
                        <div class="no-data-text display-6 my-3">
                           You have No Bookmarks yet !
                        </div>
                        <span><small>Click "Create" to Create New Bookmark.</small></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
