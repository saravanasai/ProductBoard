import { reactive, toRefs } from "vue";
import api from "../../../config";

export default function useKeyRequest() {
    const url = "/activation/new-requests";

    const state = reactive({
        requestes: {},
        request: {},
        isLoading: true,
    });

    const getActivationRequests = async (page = 1) => {
        state.isLoading = true;

        api.get(url + "?page=" + page).then((e) => {
            state.requestes = e.data;

            state.isLoading = false;
        });
    };

    const getActivationRequest = (id) => {
        state.isLoading = true;
        api.get(url + "/" + id).then((e) => {
            state.request = e.data.data;
            state.isLoading = false;
        });
    };

    const destroyActivationRequest = (id) => {
        state.isLoading = true;
        return api.delete(url + "/" + id);
    };

    return {
        ...toRefs(state),
        getActivationRequests,
        getActivationRequest,
        destroyActivationRequest,
    };
}
