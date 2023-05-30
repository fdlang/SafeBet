import {createRef, useState} from 'react'
import {Link} from 'react-router-dom'
import Alerta from '../componets/Alerta';
import { useAuth } from '../hooks/useAuth';

export default function Registro() {

	const nameRef = createRef();
	const surnameRef = createRef();
	const emailRef = createRef();
	const passwordRef = createRef();
	const passwordConfirmationRef = createRef();

	const [errores, setErrores] = useState([]);
	const {registro} = useAuth({middleware: 'guest', url: '/'});

	const handleSubmit = async e => {
		e.preventDefault();
		
		const datos = {
			name: nameRef.current.value,
			surname: surnameRef.current.value,
			email: emailRef.current.value,
			password: passwordRef.current.value,
			password_confirmation: passwordConfirmationRef.current.value
		}		

		registro(datos, setErrores)
	}

	return (
		<> 
			<h1 className="text-4xl font-black">Crea tu cuenta</h1>
			<p>Crea tu cuenta llenando el formulario</p>

			<div className="bg-white shadow-md rounded-md mt-10 px-5 py-10">
				<form 
						onSubmit={handleSubmit}
						noValidate
				> 
					{errores ? errores.map((error, i) => <Alerta key={i}>{error}</Alerta>): null}

					<div className="mb-4">
						<label className="text-slate-800" htmlFor="name" > Nombre: 
							<input 
								type="text"
								id="name" 
								className="mt-2 w-full p3 bg-gray-50"
								name="name"
								placeholder="Escribe tu nombre"
								ref={nameRef}
							/>
						</label>
					</div>

					<div className="mb-4">
						<label className="text-slate-800" htmlFor="apellidos" > Apellidos: 
							<input 
								type="text"
								id="apellidos" 
								className="mt-2 w-full p3 bg-gray-50"
								name="apellidos"
								placeholder="Escribe tus apellidos"
								ref={surnameRef}
							/>
						</label>
					</div>

					<div className="mb-4">
						<label className="text-slate-800" htmlFor="email" > Email: 
							<input 
								type="text"
								id="email" 
								className="mt-2 w-full p3 bg-gray-50"
								name="email"
								placeholder="Escribe tu email"
								ref={emailRef}
							/>
						</label>
					</div>
					
					<div className="mb-4">
						<label className="text-slate-800" htmlFor="password" > Contraseña: 
							<input 
								type="password"
								id="password" 
								className="mt-2 w-full p3 bg-gray-50"
								name="Password"
								placeholder="Escribe tu contraseña"
								ref={passwordRef}
							/>
						</label>
					</div>

					<div className="mb-4">
						<label className="text-slate-800" htmlFor="password_confirmation" > Repetir Contraseña: 
							<input 
								type="password"
								id="password_confirmation" 
								className="mt-2 w-full p3 bg-gray-50"
								name="password_confirmation"
								placeholder="Repetir contraseña"
								ref={passwordConfirmationRef}
							/>
						</label>
					</div>

					<input 
						type="submit" 
						value="Crear Cuenta"
						className="bg-indigo-600 hover:bg-indigo-800 text-white w-full mt-5 p-3
						uppercase font-blod cursor-pointer"
					/>

				</form> 
			</div>
			<nav className="mt-5">
		<Link to="/auth/login">¿Ya tienes cuenta? Inicia Sesión.</Link>
		</nav>
		</>
		)
}
