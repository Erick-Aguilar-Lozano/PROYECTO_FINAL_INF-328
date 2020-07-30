package com.umsa.repoDoc4.repoDoc4.model;

public class Escrito {
    private int id_documento;
    private int id_autor;

    public Escrito() {
    }

    public Escrito(int id_documento, int id_autor) {
        this.id_documento = id_documento;
        this.id_autor = id_autor;
    }

    public int getId_documento() {
        return id_documento;
    }

    public void setId_documento(int id_documento) {
        this.id_documento = id_documento;
    }

    public int getId_autor() {
        return id_autor;
    }

    public void setId_autor(int id_autor) {
        this.id_autor = id_autor;
    }
}
