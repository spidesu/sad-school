<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Представители
            </h2>
        </template>

        <div class="py-12">
            <Modal v-if="toggleModal" @close="toggleModal = !toggleModal; representativeList()">
                <RepresentativeForm />
            </Modal>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-2 py-3 text-right sm:px-4">
            <span class="inline-flex rounded-md shadow-sm">
              <button @click="toggleModal = !toggleModal" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Добавить представителя
              </button>
            </span>
                </div>
                <TableRepresentative v-if="representatives" :representatives = "representatives"/>
                <Loader v-else />

            </div>
        </div>
    </app-layout>
</template>

<script>
import RepresentativeForm from "@/Forms/RepresentativeForm";
import TableRepresentative from "@/Table/TableRepresentative";
import Loader from "@/Сomponents/Loader";
import Modal from "@/Layouts/Modal";
import AppLayout from "@/Layouts/AppLayout";
import RepresentativeApplicant from "@/Applicants/RepresentativeApplicant";
export default {
    name: "Representatives",
    components: {RepresentativeApplicant, Loader, TableRepresentative, RepresentativeForm, AppLayout, Modal},
    methods: {
        representativeList() {
            axios.get('/api/representatives').then((res) => {
                if (res.status === 200)
                {
                    this.representatives = res.data.data;
                }
            });
        },
    },
    data() {
        return {
            representatives: false,
            loaded: false,
            toggleModal: false,
            toggleEditModal: false,
        }
    },
    created() {
        this.representativeList();
    },
}
</script>

<style scoped>

</style>
