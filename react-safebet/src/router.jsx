import {createBrowserRouter} from 'react-router-dom'
import AuthLayout from './layouts/AuthLayout'
import Layout from './layouts/Layout'
import InicioUserLayout from './layouts/InicioUserLayout'
import Login from './views/Login'
import Registro from './views/Registro'
import InicioUser from './views/InicioUser'
import Inicio from './views/Inicio'

const router= createBrowserRouter([
    {
        path:'/',
        element: <Layout/>,
        children: [
            {
                index: true,
                element: <Inicio/>
            },
        ]
    },
    {
        path:'/auth',
        element: <AuthLayout/>,
        children:[
            {
                path: '/auth/login',
                element: <Login/>
            },
            {
                path: '/auth/registro',
                element: <Registro/>    
            }
        ]
    },
    {
        path: '/partidos',
        element: <InicioUserLayout/>,
        children:[
            {
                path: '/partidos/inicio',
                element: <InicioUser/>
            }

        ]
    }
])

export default router