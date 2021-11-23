<template>
    <div class="posts_list">
        <PostList />
    </div>
</template>

<script>

    import PostList from "./Posts/PostList.vue"

    export default {
        name: 'App',

        data() {
            return {
            }
        },

        components: {
            PostList
        }
    }
</script>