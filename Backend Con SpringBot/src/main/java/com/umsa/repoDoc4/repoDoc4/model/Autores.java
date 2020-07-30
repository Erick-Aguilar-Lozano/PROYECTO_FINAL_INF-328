package com.umsa.repoDoc4.repoDoc4.model;

public class Autores {
    private int id;
    private String nombre;

    public Autores() {
    }

    public Autores(int id, String nombre) {
        this.id = id;
        this.nombre = nombre;
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
}
