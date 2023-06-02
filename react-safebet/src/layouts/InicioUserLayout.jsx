import Modal from 'react-modal';
import {ToastContainer} from 'react-toastify'
import 'react-toastify/dist/ReactToastify.css'
import {Outlet} from 'react-router-dom'
import Sidebar2 from '../componets/Sidebar2'
import Favoritos from '../componets/Favoritos'
import useSafeBet from '../hooks/useSafeBet'
import ModalPartido from '../componets/ModalPartido';
import {useAuth} from '../hooks/useAuth'

const customStyles = {
	content: {
		top: "50%",
		left: "50%",
		right: "auto",
		bottom: "auto",
		marginRight: "-50%",
		transform: "translate(-50%, -50%)",
	},
};
Modal.setAppElement('#root'); 

export default function InicioUserLayout() {

	const {modal, handleClickModal} = useSafeBet();
	const {user, error} = useAuth({middleware: 'auth'})
	
	//console.log(user)
	//console.log(error)

	return (
		<>
			<div className='md:flex'>
					<main className='h-screen overflow-y-scroll'> 
						<Sidebar2/>				
					</main>
					<main className='flex-1 h-screen overflow-y-scroll bg-gray-100 p-3'>
						<Outlet/>
					</main>
					<Favoritos/>
			</div>
			<Modal 
				isOpen={modal}
				style={customStyles}>	
							
				<ModalPartido/>					
			</Modal>
			<ToastContainer/>
		</>
	)
}
