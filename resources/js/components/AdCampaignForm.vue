<template>
    <div class="background overflow-scroll" v-show="show">
        <div class="container my-5">
            <div class="row">
                <div class="col-6 mx-auto">
                    <div class="card">
                        <div class="card-header">Add Campaign</div>
                        <div class="card-body">
                            <form @submit="handleSubmit">
                                <div class="mb-3"><button @click="addMoreImages()" type="button" class="btn btn-secondary btn-sm">Add more images</button></div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Select file</label>
                                    <input class="form-control" accept="image/*" name="images[]" type="file" id="formFileMultiple"
                                    @change="filesChange($event.target.name, $event.target.files)">
                                </div>
                                <div class="mb-3" :key="i" v-for="i of fileFields">
                                    <label for="formFileMultiple" class="form-label d-block">Select file</label>
                                    <div class="btn-group">
                                        <input class="form-control" accept="image/*" name="images[]" type="file" id="formFileMultiple"
                                        @change="filesChange($event.target.name, $event.target.files)">
                                        <button type="button" class="btn btn-secondary" @click="removeField(i)">&times;</button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="campaignName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="campaignName" v-model="name" placeholder="A discriptive name" required>
                                </div>
                                <div class="mb-3 row no-gutters">
                                    <div class="col-6">
                                        <label for="totalBudget" class="form-label">Total Budget</label>
                                        <input type="number" min="0" class="form-control" id="totalBudget" v-model="budget_total" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="dailyBudget" class="form-label">Daily Budget</label>
                                        <input type="number" min="0" class="form-control" id="dailyBudget" v-model="budget_daily" required>
                                    </div>
                                </div>
                                <div class="mb-3 row no-gutters">
                                    <div class="col-6">
                                        <label for="fromDate" class="form-label">From Date</label>
                                        <input type="date" min="0" class="form-control" id="fromDate" v-model="from" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="toDate" class="form-label">To Date</label>
                                        <input type="date" min="0" class="form-control" id="toDate" v-model="to" required>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary" @click="toggleForm">Close</button>
                                    <button type="submit" class="btn btn-primary" :disabled="isButtonDisabled">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'AdCampaignForm',
    props: {
        show: Boolean
    },
    data() {
        return {
            name: '',
            budget_total: '',
            budget_daily: '',
            from: '',
            to: '',

            fd: new FormData(),
            fileCount: 0,
            isButtonDisabled: false,
            fileFields: [],
        }
    },
    methods: {
        toggleForm() {
            this.$emit('toggle-form')
        },
        addMoreImages(){
            if(this.fileFields.length < 2)
                this.fileFields.push(this.fileFields.length)
        },
        removeField(key){
            console.log(key);
            this.fileFields.splice(key -1);
        },
        async handleSubmit(e) {
            e.preventDefault();
            console.log('here')
            this.fd.append('name', this.name);
            this.fd.append('budget_total', this.budget_total);
            this.fd.append('budget_daily', this.budget_daily);
            this.fd.append('to', this.to);
            this.fd.append('from', this.from);

            this.$emit('add-campaign', this.fd);
            this.name = '';
            this.budget_total = '';
            this.budget_daily = '';
            this.to = '';
            this.from = '';
        },
        filesChange(fieldName, fileList) {
            if (!fileList.length) return;
            // append the files to FormData
            Array.from(Array(fileList.length).keys())
                .map(x => {
                    this.fd.append(fieldName, fileList[x], fileList[x].name);
                });

        }
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
