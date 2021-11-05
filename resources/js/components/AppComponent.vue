<template>
    <div>
        <Nav @toggle-form="toggleForm" />
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3" :key="campaign.id" v-for="campaign of campaigns">
                    <SingleAd :campaign="campaign" @campaign-clicked="handleCampaignClick" />
                </div>
            </div>
        </div>
        <AdCampaignForm :show="show" @toggle-form="toggleForm" @add-campaign="createAd" />
        <SingleCampaign v-if="showCampaign" :campaign="selectedCampaign" @close-single-campaign="closeSingleCampaign" />
    </div>
</template>

<script>
import AdCampaignForm from './AdCampaignForm.vue';
import Nav from './NavComponent.vue';
import SingleAd from './SingleAdComponent.vue';
import HttpClient from '../lib/HttpClient'
import SingleCampaign from './SingleCampaign.vue'
    export default {
        components: {
            SingleAd,
            Nav,
            AdCampaignForm,
            SingleCampaign,
        },
        data() {
            return {
                show: false,
                showCampaign: false,
                selectedCampaign: null,
                campaigns: [],
            }
        },
        methods: {
            toggleBodyClassName(bool){
                if(bool){
                    document.body.className = 'bg-light modal-opened';
                }else{
                    document.body.className = 'bg-light';
                }
            },
            toggleForm: function(){
                this.show = !this.show;
                this.toggleBodyClassName(this.show);
            },
            createAd: async function(data) {
                try{
                    for(var [key, val] of data.entries()){
                        console.log(key, val);
                    }
                    const campaign = await HttpClient.post('/api/campaigns', data);
                    this.campaigns.unshift(await campaign.json());
                    this.toggleForm();
                }catch(e){
                    console.log(e);
                }
            },
            handleCampaignClick(selectedCampaign){
                this.showCampaign = true;
                this.toggleBodyClassName(this.showCampaign);
                this.selectedCampaign = selectedCampaign;
            },
            closeSingleCampaign(){
                this.showCampaign = false;
                this.toggleBodyClassName(this.showCampaign);
            },
        },
        mounted() {
            // console.log('Component mounted.')
        },
        async created() {
            try{
                const campaigns = await HttpClient.get('/api/campaigns');
                this.campaigns = await campaigns.json();
            }catch(e){
                console.log(e)
            }
        }
    }
</script>

<style>
.modal-opened {
    height: 100%;
    widows: 100%;
    overflow: hidden;
}
</style>
