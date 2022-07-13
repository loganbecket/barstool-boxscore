import Vue from 'vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)

const opts = {
	treeShake: true,
	theme: {
		dark: false,
		themes: {
			light: {
				primary: '#141e30',
				secondary: '#c62232',
				success: '#15AB5A',
				light_success: '#D7FFDA',
				danger: '#FF5C5C',
				light_danger: '#FFDADA',
				warning: '#fb8c00',
				light_warning: '#fff8ee',
				vuetify_gray: '#757575'
			}
	    }
	}
}

export default new Vuetify(opts)