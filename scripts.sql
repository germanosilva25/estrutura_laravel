Table users as U {
  id int [pk, increment] // auto-increment
  full_name varchar
  created_at timestamp
  country_code int
}

Table agendamentos as A {
  id int [pk, increment] // auto-increment
  id_dia int
  datahora_inicio datetime
  datahora_fim datetime
  valor float
  status int
  id_user_credor int
  tipo_agendamento int
}

Ref: A.id_dia > D.id
Ref: A.id_user_credor > U.id


Table dia as D {
  id int [pk, increment] // auto-increment
  dia_semana int
  id_user int
  inicio datetime
  para_almoco datetime
  volta_almoco datetime
  fim datetime
  intervalo int

}

Ref: D.id_user > U.id