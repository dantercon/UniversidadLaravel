public function store(Request $request)
    {
        $input = $request->all();

        $messages['name.required'] = 'El nombre es requerido';
        $messages['email.required'] = 'El email es requerido';
        $messages['email.email'] = 'El email que ingreso no es valido';
        $messages['email.unique'] = 'El email ya existe en nuestra base de datos';
        $messages['password.required'] = 'Contraseña es requerida';


        $rules['name'] = 'required';
        $rules['email'] = 'required|unique:users,email|email';
        $rules['password'] = 'required';


        $validate = Validator::make($input, $rules, $messages);

        if($validate->fails()){

            $response = [
                'success' => false,
                'message' => 'Error en el formulario verifique sus datos',
                'errors' => $validate->errors()
            ];
        }else{
            $usuarios = new User();

            $usuarios->name = $request->get('name');
            $usuarios->email = $request->get('email');
            $usuarios->password = Hash::make($request->password);

            $usuarios->save();

            $response = [
                'success' => true,
                'message' => 'Se creo correctamente el usuario'
            ];

        }

        return redirect('/user');
    }
