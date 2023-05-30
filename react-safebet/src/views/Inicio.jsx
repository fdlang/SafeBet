import useSWR from 'swr'
import Torneo from "../componets/Torneo"
import useSafeBet from "../hooks/useSafeBet"
import clienteAxios from '../config/axios'
import Loading from '../componets/Loading';
import Alerta from '../componets/Alerta'
 
export default function Inicio() {

  const {categoriaActual} = useSafeBet()
  
  // Consulta SWR
  const fetcher = () => clienteAxios('/api/torneos').then(data => data.data)
  const {data, error, isLoading} = useSWR('/api/torneos', fetcher)

  if (error){
    return (
      <Alerta> 
          <p>Ups... Algo ha salido mal, revise la conexión a internet.</p>
          <p>Si el error persiste y la conexión es correcta, póngase en contacto con el servicio técnico e indique: {error.message}</p>
      </Alerta>
  )};

  if (isLoading) return <Loading/>;

  const torneos = data.data.filter(torneo => torneo.categoria_id === categoriaActual.id)
  
  return (
    <>
      <h1 className="text-4xl font-black" >{categoriaActual.name}</h1>
      <p className="text-2xl my-10">Torneos disponibles, pincha sobre el torneo para ver los partidos.</p>
      
      <div className="grid gap-4 grid-cols-1 md:grid-flow-cols-2 xl:grid-cols-3">
        {torneos.map(torneo =>(
            <Torneo
              key = {torneo.id} 
              torneo = {torneo}
            />
        ))}
      </div>
    </>
  )
  
}