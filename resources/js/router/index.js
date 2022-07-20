import { createWebHistory, createRouter } from "vue-router";

import Home from "../pages/Home";
import Register from "../pages/Register";
import Login from "../pages/Login";
import Dashboard from "../pages/Dashboard";
import ToDoLists from "../components/ToDoLists";
import AddToDoLists from "../components/AddToDoLists";
import EditToDoLists from "../components/EditToDoLists";

export const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
    },
    {
        name: "register",
        path: "/register",
        component: Register,
    },
    {
        name: "login",
        path: "/login",
        component: Login,
    },
    {
        name: "dashboard",
        path: "/dashboard",
        component: Dashboard,
    },
    {
        name: "todolists",
        path: "/todolists",
        component: ToDoLists,
    },
    {
        name: "addtodolists",
        path: "/todolist/add",
        component: AddToDoLists,
    },
    {
        name: "edittodolists",
        path: "/todolist/edit/:id",
        component: EditToDoLists,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
