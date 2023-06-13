import React from 'react'
import ReactDOM from 'react-dom/client'
import {RouterProvider} from 'react-router-dom'
import {SafeBetProvider} from './context/SafeBetProvider'
import router from './router'
import './index.css'


ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <SafeBetProvider>
        <RouterProvider router={router}/>   
    </SafeBetProvider>
  </React.StrictMode>,
)
