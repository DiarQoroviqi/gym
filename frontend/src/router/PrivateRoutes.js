import Dashboard from "../views/Dashboard.vue";
import DefaultLayout from "../layouts/AdminLayout.vue";

export default [
    {
        path: '/dashboard',
        name: 'dashboard',
        component: DefaultLayout,
        meta: { auth: true },
        children: [
            {path: '/dashboard', name: 'dashboard', component: Dashboard, meta: { auth: true },}
        ]
    },
]