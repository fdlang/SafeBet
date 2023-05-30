import useSWR from 'swr';
import Partido from "../componets/Partido";
import useSafeBet from "../hooks/useSafeBet";
import clienteAxios from '../config/axios';
import { formatNameTorneo } from '../utils/helpers';
import Loading from '../componets/Loading';
import Alerta from '../componets/Alerta'

export default function InicioUser() {
  const { datos } = useSafeBet();

  // Consulta SWR
  const fetcher = () => clienteAxios(`api/id/${datos.id}`).then(data => data.data);
  const { data, error, isLoading } = useSWR(`api/id/${datos.id}`, fetcher);

  if (error){
    return (
      <Alerta> 
          <p>Ups... Algo ha salido mal, revise la conexión a internet.</p>
          <p>Si el error persiste y la conexión es correcta, póngase en contacto con el servicio técnico e indique: {error.message}</p>
      </Alerta>
  )};

  if (isLoading) return <Loading/>;

  const partidos = data.data;
  const titulo = formatNameTorneo(datos.name);

  return (
    <>
      <h1 className="text-4xl font-black">{titulo}</h1>
      <p className="text-2xl my-10">Partidos disponibles.</p>

      <div className="grid gap-4 grid-cols-1 md:grid-flow-cols-2 xl:grid-cols-3">
        {partidos.map(partido => (
          <Partido
            key={partido.id}
            partido={partido}
          />
        ))}
      </div>
    </>
  );
}
