<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination" v-if="!loading">
            <li class="page-item" v-bind:class="{ 'disabled': currentPage==1 }"><a class="page-link" @click="currentPage--;GoToPage(currentPage)" href="javascript:;">Previous</a></li>
            
            <li v-for="index in pageSize" :key="index" v-if="index<=currentPage+5&&index>=currentPage-5" class="page-item" v-bind:class="{ 'active': index==currentPage }">
                <a v-if="index<currentPage+5&&index>currentPage-5" class="page-link" @click="GoToPage(index)" href="javascript:;">{{ index  }}</a>
                <a v-else class="page-link disabled" href="javascript:;">...</a>
            </li>

            <li class="page-item" v-bind:class="{ 'disabled': currentPage==pageSize}"><a class="page-link"  @click="currentPage++;GoToPage(currentPage)" href="javascript:;">Next</a></li>
            <li class="page-item" v-bind:class="{ 'disabled': false}"><a class="page-link" href="javascript:;">{{currentPage}} / {{pageSize}}</a></li>
        </ul>
        <ul class="pagination" v-else>
            <li class="page-item" v-bind:class="{ 'disabled': currentPage==1 }"><a class="page-link" href="javascript:;">Previous</a></li>
            
            <li v-for="index in pageSize" :key="index" class="page-item" v-bind:class="{ 'active': index==currentPage }">
                <a class="page-link" href="javascript:;">{{ index  }}</a>
            </li>

            <li class="page-item" v-bind:class="{ 'disabled': currentPage==pageSize}"><a class="page-link" href="javascript:;">Next</a></li>
        </ul>
    </nav>
</template>

<script>
export default {
  props: ['pageSize','currentPage','GoToPage','loading'],
}
</script>
<style scope>

</style>