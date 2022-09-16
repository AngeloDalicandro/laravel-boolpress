<template>
    
    <div class="container">
        
        <div v-if="post"> 

            <h1> {{ post.title }} </h1> 

            <div v-if="post.category">Categoria : {{ post.category.name }}</div>

            <div v-if="post.tags.length > 0">
                <span v-for="tag in post.tags" :key=" tag.id " class="badge rounded-pill bg-primary"> {{ tag.name }} </span>
            </div>
            
            <p class="mt-3"> {{ post.content }} </p>
        </div>

        <div v-else>Loading...</div> 
    </div> 

</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: null,
            path: 'http://127.0.0.1:8000/api/posts/'
        }
    },
    mounted() {
        // axios.get('api/posts/' + this.$route.params.slug)
        // .then((response) => {
        //     this.post = response.data.results;
        // })
        axios.get(this.path + this.$route.params.slug, )
        .then((response) => {
            if(response.data.success) {
                this.post = response.data.results;
            } else {
                this.$route.push({name: 'not-found'});
            }
        })
    }
}
</script>