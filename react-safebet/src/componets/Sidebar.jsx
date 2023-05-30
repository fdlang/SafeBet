import { Link } from "react-router-dom";
import useSafeBet from "../hooks/useSafeBet";
import Tour from "./Tour"
import { useAuth } from "../hooks/useAuth";


export default function Sidebar() {

    const {categorias} = useSafeBet()
    const {logout, user} = useAuth({middleware: 'auth'})

    return (
        <aside className="md:w-72">
            <div className="p-4">
                <img
                    className="w-60"
                    src="/img/logo.png"   
                    alt="Imagen Logo"               
                />
            </div>

            <p className="my-2 text-xl text-center">Bienvenido: {user?.name}</p>
        
            <div className="mt-10">
                {categorias.map(torneo => (
                    <Tour
                        key = {torneo.id}
                        tour = {torneo}
                    />
                ))}
            </div>

            <div className='mt-2'>
                <button 
                    type="button"
                    className='bg-indigo-600 hover:bg-indigo-800 px-5 py-2 rounded uppercase font-bold text-white text-center 
                    w-full cursor-pointer truncate'
                    onClick={logout}
            >
                    cerrar sesion        
                </button>
            </div>
        </aside>
    );
}

