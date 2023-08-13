// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    head: {
      title: 'Nuxt # CRUD Application',
      meta: [
        {
          charset: 'utf-8'
        },
        {
          name: 'viewport', content: 'width=devive-width, initial-scale=1'
        },
        { name: 'description', content: 'My amazing site.' }

      ],
      link: [
        {
          rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Roboto&display=swap'
        },
        {
          rel: 'icon',
          type: 'image/x-icon',
          href: '/favicon.ico'
        },
        {
          rel: 'stylesheet',
          href: '/css/bootstrap.min.css'
        },
      ],
      script: [
        {
          src: '/js/jquery-3.6.4.min.js',
          type: 'text/javascript'
        }, {
          src: '/js/bootstrap.min.js',
          type: 'text/javascript'
        }
      ]
    }
  },
  generate: {
    fallback: true
  }
})
