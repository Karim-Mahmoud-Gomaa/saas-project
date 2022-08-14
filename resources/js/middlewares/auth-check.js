export default async function checkAuth({ next, store }) {
    if (!store.getters["auth/check"] && store.getters["auth/token"]) {
        await store.dispatch("auth/fetchUser");
        if(store.getters["auth/check"]){
            return next();
        }else{
            return next({ name: "login" });
        }
    } else if (store.getters["auth/check"] && store.getters["auth/token"]) {
        return next();
    } else {
        return next({ name: "login" });
    }
}
