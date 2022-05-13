import { reactive, toRefs } from "vue";
import api from "../../../config";

export default function useProduct() {
    const url = "/my-products/product/";

    const state = reactive({
        products: {},
        product: {},
        isLoading: true,
    });

    const getProducts = async () => {
        state.isLoading = true;

        api.get(url).then((e) => {
            state.products = e.data.data;
            state.isLoading = false;
        });
    };

    const getProduct = (id) => {
        state.isLoading = true;
        api.get(url + id).then((e) => {
            state.product = e.data.data;
            state.isLoading = false;
        });
    };

    const addProduct = (data) => {
        state.isLoading = true;
        return api.post(url, data);
    };

    const updateProduct = (id) => {
        state.isLoading = true;
        return api.put(url + id, state.product);
    };

    const destroyProduct = (id) => {
        state.isLoading = true;
        return api.delete(url + id);
    };

    return {
        ...toRefs(state),
        getProducts,
        getProduct,
        updateProduct,
        destroyProduct,
        addProduct,
    };
}
