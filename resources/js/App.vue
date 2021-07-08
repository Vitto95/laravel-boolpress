<template>
    <div class="container">
        <h1>Hello Word - App.vue</h1>

        <section v-for="(post, index) in posts" :key="index">
            <h3>{{ post.title }}</h3>
            <h4>{{ post.category }}</h4>
            <h5>{{ post.date }}</h5>
            <div>
                <a href="#">go...</a>
            </div>
        </section>

        <div class="nav-pages">
            <button
                class="badge badge-primary"
                @click="getPosts(pagination.current - 1)"
            >
                prev
            </button>
            <button
                class="badge badge-primary"
                @click="getPosts(pagination.current + 1)"
            >
                next
            </button>
        </div>
    </div>
</template>

<script>
import axios from "axios"; /* anche se non metto il percorso completo, vue va a cercare dentro node_modules */

export default {
    name: "App",
    data() {
        return {
            posts: [],
            pagination: {}
        };
    },
    methods: {
        getPosts(page = 1) {
            axios
                .get("http://127.0.0.1:8000/api/posts", {
                    params: {
                        page: page
                    }
                })
                .then(res => {
                    this.posts = res.data.data;
                    this.pagination = {
                        current: res.data.current_page,
                        last: res.data.last_page
                    };
                    console.log("POSTS", this.posts);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created() {
        this.getPosts();
    }
};
</script>

<style lang="scss">
@import "../sass/frontoffice/global";
</style>
