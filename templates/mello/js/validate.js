const username = document.getElementById('username')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')
const errorElement2 = document.getElementById('error-2')

    form.addEventListener('submit', (e) => {
        let messages = []

        if(password.value.length <= 6) {
            messages.push('Password có độ dài tối thiểu 6 kí tự')
        }
        if(password.value.length >20) {
            messages.push('Password có độ dài không quá 20 kí tự')
        }

        if(password.value === 'password'){
            messages.push('Password cannot be password')
        }

        if(messages.length > 0){
            e.preventDefault()
            errorElement.innerText = messages.join(', ')
        }
        e.preventDefault()

    })

    form.addEventListener('submit', (e) => {
        let messages2 = []
        if(username.value === '' || username.value == null){
            messages2.push('Vui lòng nhập tên người dùng')
        }

        if(messages2.length > 0){
            e.preventDefault()
            errorElement2.innerText = messages2.join(', ')
        }
        e.preventDefault()

    })
