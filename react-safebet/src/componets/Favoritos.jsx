import useSWR, {mutate} from 'swr';
import clienteAxios from '../config/axios';
import FavoritoPartido from './FavoritoPartido';

export default function Resumen() {
 
    const token = localStorage.getItem('AUTH_TOKEN');
    const config = {
        headers: {
        Authorization: `Bearer ${token}`,
        },
    };
      
    const { data: partidos, error, isLoading } = useSWR('/api/favoritos/partidos', () =>
        clienteAxios.get('/api/favoritos/partidos', config).then((res) => res.data.partidos)
    );
    mutate('/api/favoritos/partidos')

    return (
        <aside className="md:w-72 h-screen overflow-y-scroll p-5">
            <h1 className="text-2xl font-black">Mis favoritos</h1>
            <p className="text-lg my-5">Aquí podrás ver tu lista de favoritos</p>

            <div className="py-10">
                {partidos && partidos.length === 0 ? (
                    <p className="text-center text-2xl">No hay datos en tus favoritos aún</p>
                ) : (
                    partidos &&
                    partidos.map((partido) => (
                        <FavoritoPartido 
                            key={partido.id} 
                            partido={partido} 
                        />
                    ))
                )}
            </div>
        </aside>
    );
}
