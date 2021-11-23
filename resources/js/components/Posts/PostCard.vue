<template>
    <div class="card">
        {{ title }} <br>
        {{ date }} <br>
        {{ content }} <br>
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