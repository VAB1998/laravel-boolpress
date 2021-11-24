<template>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title"> {{ title }} </h5>
            <h6 class="card-subtitle text-muted"> {{ author }} - {{ date }} </h6>
            <h6 class="badge badge-primary px-4"> {{ category }} </h6> 
            <p class="card-text"> {{ content }} </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PostCard',

    props: {
        title: String,
        content: String,
        date: String,
        author: String,
        category : String,
    }
}
</script>