import type { Coordinate } from "../src/types/Coordinate";

export async function calculateDistance(pointA: Coordinate, pointB: Coordinate) {
  const res = await fetch("http://localhost:8000", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ pointA, pointB }),
  });

  if (!res.ok) throw new Error("API error");

  return (await res.json()).distance;
}
