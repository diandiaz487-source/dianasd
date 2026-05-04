import tkinter as tk from tkinter import ttk

Función principal

def segmentar(): try: edad = int(entry_edad.get()) interes = combo_interes.get()

resultado = ""

    # Lógica de segmentación
    if edad < 18:
        if interes == "Videojuegos":
            resultado = "🎮 Anuncios de videojuegos y streaming"
        else:
            resultado = "📱 Contenido juvenil y tendencias"

    elif 18 <= edad < 30:
        if interes == "Fitness":
            resultado = "💪 Gimnasio, proteína y vida saludable"
        elif interes == "Belleza":
            resultado = "💄 Maquillaje y skincare"
        elif interes == "Tecnología":
            resultado = "💻 Gadgets y apps"
        else:
            resultado = "🌐 Contenido general digital"

    else:
        if interes == "Tecnología":
            resultado = "🖥️ Servicios digitales y gadgets avanzados"
        else:
            resultado = "🏥 Salud, seguros y bienestar"

    label_resultado.config(text=resultado)

except ValueError:
    label_resultado.config(text="⚠️ Ingresa una edad válida")

Ventana principal

root = tk.Tk() root.title("Segmentador de Marketing Digital") root.geometry("400x300") root.configure(bg="#1e1e2f")

Estilo

style = ttk.Style() style.theme_use('default')

Título

label_titulo = tk.Label(root, text="Segmentador Inteligente", font=("Arial", 16, "bold"), fg="white", bg="#1e1e2f") label_titulo.pack(pady=10)

Edad

label_edad = tk.Label(root, text="Edad:", fg="white", bg="#1e1e2f") label_edad.pack()

entry_edad = tk.Entry(root) entry_edad.pack(pady=5)

Intereses

label_interes = tk.Label(root, text="Interés:", fg="white", bg="#1e1e2f") label_interes.pack()

combo_interes = ttk.Combobox(root, values=["Fitness", "Belleza", "Videojuegos", "Tecnología"]) combo_interes.pack(pady=5) combo_interes.current(0)

Botón

btn = tk.Button(root, text="Segmentar", command=segmentar, bg="#4CAF50", fg="white", font=("Arial", 10, "bold")) btn.pack(pady=15)

Resultado

label_resultado = tk.Label(root, text="", font=("Arial", 12), fg="#00ffcc", bg="#1e1e2f") label_resultado.pack(pady=10)

Ejecutar

root.mainloop()