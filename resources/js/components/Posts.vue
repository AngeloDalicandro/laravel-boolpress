<template>
    
    <section>

        <div class="container">

            <h2>Ecco i nostri post</h2>

            <div class="row row-cols-3">

                <div v-for="post in posts" :key="post.id" class="col">
                    <div class="card mt-3">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title"> {{ post.title }} </h5>
                            <p class="card-text"> {{ truncateText(post.content) }} </p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>

            </div>

            <nav class="mt-3">
                <ul class="pagination">
                    <li  class="page-item" :class="{'disabled' : currentPage == 1 }"><a @click.prevent="getPosts(currentPage - 1)" class="page-link" href="#">Previous</a></li>

                    <li v-for="pageNumber in lastPage" :key="pageNumber" :class="{'active' : pageNumber == currentPage}" class="page-item"><a @click="getPosts(pageNumber)" class="page-link" href="#"> {{ pageNumber }} </a></li> 

                    <li  class="page-item" :class="{'disabled' : currentPage == lastPage}"><a @click.prevent="getPosts(currentPage + 1)" class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>

    </section>

</template>


<script>
export default {
    name: 'Posts',
    data() {
        return {
            posts: [],
            path: 'http://127.0.0.1:8000/api/posts',
            currentPage: null,
            lastPage: null
        }
    },
    methods: {
        truncateText(text) {
            return text.length > 100 ? text.slice(0, 100) + '...' : text;
        },
        getPosts(pageNumber) {
            axios.get(this.path, {
                params: {
                    page: pageNumber
                }
            })
            .then((response) => {
                this.posts = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
            });
        }
    },    
    mounted() {
        this.getPosts(1);
    }
}
</script>
