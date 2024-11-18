<style>
    /* Services section */
    .services {
            padding: 2rem 0;
            background-color: #ffffff;
        }

        .services h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #2f8f2f;
        }

        .service-cards {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
        }

        .card {
            background-color: #f9f9f9;
            padding: 1.5rem;
            width: 30%;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .card h3 {
            margin-bottom: 0.5rem;
            color: #2f8f2f;
        }

        .card p {
            color: #666;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
       
</style>

 <!-- Services Section -->
 <section id="services" class="services">
            <h2>Our Services</h2>
            <div class="service-cards">
                <div class="card">
                    <img src="img/dept_1.jpg" alt="Service 1">
                    <h3>Department of Immigration and Passport</h3>
                    <p>Immigration and Passport</p>
                </div>
                <div class="card">
                    <img src="img/dept_2.jpg" alt="Service 2">
                    <h3>Department of Transport</h3>
                    <p>Transport</p>
                </div>
                <div class="card">
                    <img src="img/dept_3.jpg" alt="Service 3">
                    <h3>Department of Citizenship</h3>
                    <p>Citizenship</p>
                </div>
            </div>
        </section>