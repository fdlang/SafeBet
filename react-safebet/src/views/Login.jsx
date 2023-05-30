import {createRef, useState} from 'react'
import {Link} from 'react-router-dom'
import Alerta from '../componets/Alerta';
import {useAuth} from '../hooks/useAuth';
 
export default function Login() {

	const emailRef = createRef();
	const passwordRef = createRef();

	const [errores, setErrores] = useState([]);
	const {login} = useAuth({
		middleware: 'guest',
		url: '/' // si esta autenticado le redirige a la pagina principal
	})

	const handleSubmit = async e => {
		e.preventDefault();
		
		const datos = {
			email: emailRef.current.value,
			password: passwordRef.current.value,
		}		
		login(datos, setErrores)
	}

  return (
	<>
	  <h1 className="text-4xl font-black">Inicia Sesión</h1>
	  <p>Inicia Sesión para ver tus favoritos</p>

	  <div className="bg-white shadow-md rounded-md mt-10 px-5 py-10">
		<form 
			onSubmit={handleSubmit}
			noValidate
		>
			{errores ? errores.map((error, i) => <Alerta key={i}>{error}</Alerta>): null}

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

			<input 
				type="submit" 
				value="Iniciar Sesión"
				className="bg-indigo-600 hover:bg-indigo-800 text-white w-full mt-5 p-3
				uppercase font-blod cursor-pointer"
			/>

		</form>
	  </div>
	  <nav className="mt-5">
		<Link to="/auth/registro">¿No tienes cuenta? Crea una.</Link>
	  </nav>

	</>
  )
}
