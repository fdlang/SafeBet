import {createContext, useState, useEffect} from 'react'
import {toast} from 'react-toastify'
import {torneos as torneosDB} from "../data/torneos"
import {partidos as partidosDB} from "../data/partidos"
import clienteAxios from '../config/axios'
import { mutate } from 'swr'

const SafeBetContext = createContext();

const SafeBetProvider = ({children}) => {

    // CATEGORIAS = TOUR
    const [categorias, setCategorias] = useState([]); 
    const [categoriaActual, setCategoriaActual] = useState({}) // inicia como objeto vacio

    const obtenerCategorias = async () => {
        try {
            const {data} = await clienteAxios('/api/tour')

            setCategorias(data.data)
            setCategoriaActual(data.data[0])
        } catch (error) {
            console.log(error)
        }
    }

    useEffect(() => {
        obtenerCategorias();
    }, [])
    
    const handleClickCategoria = id => {
        const categoria = categorias.filter(categoria => categoria.id === id)[0]
        setCategoriaActual(categoria)
    }

    // TORNEOS
    const [torneos, setTorneos] = useState(torneosDB);
    const [torneoActual, setTorneoActual] = useState(torneos[0])   
    
    const handleClickTorneo = id => {
        const torneo = torneos.filter(torneo => torneo.id === id)[0]
        setTorneoActual(torneo)
    }

    // PARTIDOS
    const [partidos, setPartidos] = useState(partidosDB);
    const [partidoActual, setPartidoActual] = useState(partidos[0])
    
    const handleClickPartido = id => {
        const partido = partidos.filter(partido => partido.match.id === id)[0]
        setPartidoActual(partido)
    }

    // MODAL
    const [modal, setModal] = useState(false) 
    const handleClickModal = () => {
        setModal(!modal)
    }

    // DATOS 'OBJETO' SIN FILTRO
    const [datos, setDatos] = useState({});
    const handleClickDatos = dato => {
        setDatos(dato)
    }
    // DATOS 'OBJETO' SIN FILTRO PARA PARTIDOS
    const [datosPartido, setDatosPartido] = useState({});
    const handleClickDatosPartido = dato => {
        setDatosPartido(dato)
    }
    
    // FAVORITOS
    const [favorito, setFavorito] = useState([]);
    
    const handleAgregarFavorito = async ({ torneo_id, ...partidos }) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const { data } = await clienteAxios.post(
                '/api/favoritos',
                {
                    partidos: [{ id: partidos.id }],
                },
                {
                    headers: {
                    Authorization: `Bearer ${token}`,
                    },
                }
            );
            toast.success(data.message);
        } catch (error) {
            console.log(error);
            toast.error(error.response.data.message);
        }
        setFavorito([...favorito, partidos]);
        mutate('/api/favoritos');
      };
          
      const handleEliminarFavoritoPartido = async (id) => {
        try {
            const token = localStorage.getItem('AUTH_TOKEN');
            const { data } = await clienteAxios.delete(`/api/favoritos/${id}`, 
            {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            });

            if (data.message === 'No se encontró el favorito.'){
                toast.error(data.message)
            }else {
                toast.success(data.message);
                setFavorito([...favorito, partidos]);
                mutate(`/api/favoritos/${id}`);
            }
        } catch (error) {
            console.log(error);
        }
    };
      

    return(
        <SafeBetContext.Provider
            value={{
                categorias,
                categoriaActual,
                handleClickCategoria,

                torneos,
                torneoActual,
                handleClickTorneo,

                partidos,
                partidoActual,
                handleClickPartido,

                modal,
                handleClickModal,

                datos,
                handleClickDatos,

                datosPartido,
                handleClickDatosPartido,

                favorito,
                handleAgregarFavorito,
                handleEliminarFavoritoPartido,
            }}
        >{children}</SafeBetContext.Provider>
    )

}
export{SafeBetProvider}
export default SafeBetContext