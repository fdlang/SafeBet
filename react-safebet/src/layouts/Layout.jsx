import {Outlet} from 'react-router-dom'
import Favoritos from '../componets/Favoritos'
import Sidebar from '../componets/Sidebar'
import {useAuth} from '../hooks/useAuth'
import { ToastContainer } from 'react-toastify'

export default function Layout() {

	const {user, error} = useAuth({middleware: 'auth'})
	
	//console.log(user)
	//console.log(error)

	return (
		<div className='md:flex'>
				<Sidebar/>
				<main className='flex-1 h-screen overflow-y-scroll bg-gray-100 p-3'>
					<Outlet/>
				</main>
				<Favoritos/>
				<ToastContainer/>
		</div>
	)
}
