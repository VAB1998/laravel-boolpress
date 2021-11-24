<template>
    <div class="post_list">

        <PostCard v-for="post in posts" :key="post.id" 
        :title="post.title" :content="post.post_content" :date="post.post_date" />        

    </div>
</template>

<script>
    import PostCard from './PostCard.vue'

    export default {
        name: 'PostList',

        data() {
            return {
                posts : [],
                baseUri : 'http://127.0.0.1:8000',
            }
        },

        components: {
            PostCard
        },

        methods: {
            /**
             * Make HTTP GET Request to an API and place the result in posts array
             */
            getPostList(){
                axios.get(`${this.baseUri}/api/posts/`)
                .then((response)=> {
                    console.log(response.data.posts);
                    this.posts= response.data.posts;
                })
                .catch((err)=> {
                    console.error(err);
                })
            }
        },

        created() {
            this.getPostList();
        }
    }
</script>