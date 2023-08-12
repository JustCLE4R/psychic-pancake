import express from "express";
import cors from "cors";
import userRoute from "./routes/userRoute.js";

const app = express();
app.use(cors());
app.use(express.json());
app.use(userRoute);

app.listen(6500, ()=>console.log('server up and running on port 6500'));