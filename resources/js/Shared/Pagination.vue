<template>
    <div>
        <!-- 
            I intend to recreate a simple pagination [simplePaginate()] for performance purpose 
            read https://laravel.com/docs/8.x/pagination#simple-pagination

            If you think you will not have huge dataset in the future you can use
            the paginate() by uncommenting below and in the actual component.
        -->

        <!-- <Component 
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links" 
            :href="link.url" 
            v-html="link.label"
            class="p-3 text-decoration-none"
            :class="{'text-muted' : !link.url, 'fw-bold' : link.active}"
        /> --> 

        <ul class="pagination">
            <li class="page-item">
                <Link class="page-link" :href="prev" v-if="prev" preserve-scroll>Previous</Link>
                <span class="page-link" :class="{ 'text-muted' : !prev }" v-else >Previous</span>
            </li>
            <li class="page-item">
                <Link class="page-link" :href="next" v-if="next" preserve-scroll>Next</Link>
                <span class="page-link" :class="{ 'text-muted' : !next }" v-else >Next</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        prev: String,
        next: String
    }
}
</script>

