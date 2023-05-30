import { Link } from "react-router-dom";


export default function Sidebar2() {

    return (
        <aside className="md:w-72">
            <div className="p-4">
                <img
                    className="w-60"
                    src="/img/logo.png"   
                    alt="Imagen Logo"               
                />
            </div>
        {
            <div className='mt-5 p-5'>
                <button className='bg-indigo-600 hover:bg-indigo-800 px-5 py-2 rounded uppercase font-bold text-white text-center w-full cursor-pointer'>
                    <Link to="/">atras</Link>          
                </button>
            </div>
        }
        </aside>
    );
}

