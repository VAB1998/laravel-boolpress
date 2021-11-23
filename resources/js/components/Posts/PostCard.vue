<template>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> {{ title }} </h5>
            <h6 class="card-subtitle text-muted"> {{ date }} </h6>
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
    }

}
</script>