<template>
    <div class="card" @click="$emit('campaign-clicked', campaign)">
        <img class="img-fluid" :src="getSrc()" alt="placeholder">
        <div class="card-body">
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
    </div>
</template>



<script>
export default {
    name: 'SingleAd',
    props: {
        campaign: Object
    },
    methods: {
        getSrc() {
            const def = "https://via.placeholder.com/500x400";
            if(this.campaign.images && this.campaign.images.length > 0){
                return '/storage/images/' +this.campaign.images[0].image_name;
            }
            return def;
        }
    }
}
</script>
