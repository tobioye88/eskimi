<template>
    <div class="background overflow-scroll">
        <div class="container my-5">
            <div class="row">
                <div class="col-11 col-md-7 col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-header">Single Campaign</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6" :key="image.id" v-for="image of campaign.images">
                                    <img class="img-fluid" :src="'/storage/images/' + image.image_name" alt="placeholder">
                                </div>
                            </div>
                            <div class="text-end">+ {{ campaign.images.length }}</div>
                            <div class="text-muted text-uppercase small">Name</div>
                            <div>{{ campaign.name }}</div>
                            <div class="row no-gutters">
                                <div class="col-12 text-muted text-uppercase small">Budget</div>
                                <div class="col">Daily:  {{ campaign.budget_daily }}</div>
                                <div class="col">Total:  {{ campaign.budget_total }}</div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-12 text-muted text-uppercase small">Date</div>
                                <div class="col">
                                    From:  {{ campaign.from }}
                                </div>
                                <div class="col">
                                    To:  {{ campaign.to }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-secondary" @click="$emit('close-single-campaign')">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'SingleCampaign',
    props: {
        campaign: Object
    },
    methods: {
        // getSrc(image) {
        //     const def = "https://via.placeholder.com/500x400";
        //     if(this.campaign.images && this.campaign.images.length > 0){
        //         return '/storage/images/' +this.campaign.images[0].image_name;
        //     }
        //     return def;
        // }
    }
}
</script>

<style scoped>
.background {
    top: 0;
    left: 0;
    z-index: 1000;
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: #9886ff50;
}
</style>
