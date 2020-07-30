package com.umsa.repoDoc4.repoDoc4.model;

public class Usuarios {
    private int id;
    private String nombre;
    private String login;
    private String pass;
    private String correo;
    private String telefono;
    private String perfil;

    public Usuarios() {
        this.id=0;
        this.nombre="prueba";
        this.login="login";
        this.pass="pass";
        this.correo="correo";
        this.telefono="telefono";
        this.perfil="perfil";
    }

    public Usuarios(int id, String nombre, String login, String pass, String correo, String telefono, String perfil) {
        this.id = id;
        this.nombre = nombre;
        this.login = login;
        this.pass = pass;
        this.correo = correo;
        this.telefono = telefono;
        this.perfil = perfil;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getPass() {
        return pass;
    }

    public void setPass(String pass) {
        this.pass = pass;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getTelefono() {
        return telefono;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public String getPerfil() {
        return perfil;
    }

    public void setPerfil(String perfil) {
        this.perfil = perfil;
    }
}
